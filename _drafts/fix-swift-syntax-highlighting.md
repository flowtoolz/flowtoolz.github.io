---
title: "Draft:  fix swift syntax highlighting"
layout: post
excerpt: "???"
image_url: ???
---

{% highlight swift %}
{% raw %}

// MARK: -

public extension Observer
{
    func observe<O: Observable>(_ observable: O,
                                update: @escaping (O.Event?) -> ())
    {
        observable.add(self, update: update)
    }

    func stopObserving<O: Observable>(_ observable: O)
    {
        observable.remove(self)
    }

    func observe<Value>(_ variable: Variable<Value>,
                        update: @escaping (Value?, Value?) -> ())
    {
        variable.add(self, update: update)
    }

    func stopObserving<Value>(_ variable: Variable<Value>)
    {
        variable.remove(self)
    }

    func stopAllObserving()
    {
        Observation.removeObserverFromAllObservables(self)
        removeObserverFromAllVariables(self)
    }
}

// MARK: -

public protocol Observer: AnyObject
{
    func observe<O: Observable>(_ variable: O,
                                update: @escaping (O.Event?) -> ())
    func stopObserving<O: Observable>(_ variable: O)

    func observe<Value>(_ variable: Variable<Value>,
                        update: @escaping (Value?, Value?) -> ())
    func stopObserving<Value>(_ variable: Variable<Value>)

    func stopAllObserving()
}

// MARK: -

public extension Observable
{
    func add(_ observer: AnyObject, update: @escaping Update)
    {
        Observation.add(observer, of: self) { update($0 as? Event) }
    }

    func remove(_ observer: AnyObject)
    {
        Observation.remove(observer, of: self)
    }

    func removeAllObservers()
    {
        Observation.removeAllObservers(of: self)
    }

    func updateObservers(_ event: Event? = nil)
    {
        Observation.updateObservers(of: self, with: event)
    }
}

public protocol Observable: AnyObject
{
    func add(_ observer: AnyObject, update: @escaping Update)
    func remove(_ observer: AnyObject)
    func removeAllObservers()
    func updateObservers(_ event: Event?)

    typealias Update = (_ event: Event?) -> ()
    associatedtype Event: Any
}

// MARK: -

public class Variable<Value: Codable & Equatable>: Codable, ObserverRemover
{
    // MARK: Adding and Removing Observers

    public func add(_ observer: AnyObject, update: @escaping Update)
    {
        removeNilObservers()

        let observerInfo = ObserverInfo(observer: observer, update: update)

        observerInfos[hash(observer)] = observerInfo

        if observerInfos.count == 1
        {
            let weakObserverRemover = WeakObserverRemover(observerRemover: self)
            observedVariables[hash(self)] = weakObserverRemover
        }

        update(value, value)
    }

    public func remove(_ observer: AnyObject)
    {
        removeNilObservers()

        observerInfos[hash(observer)] = nil

        if observerInfos.count == 0
        {
            observedVariables[hash(self)] = nil
        }
    }

    public func removeAllObservers()
    {
        observerInfos.removeAll()

        observedVariables[hash(self)] = nil
    }

    deinit
    {
        observedVariables[hash(self)] = nil
    }

    // MARK: Codable State

    enum CodingKeys: String, CodingKey { case value }

    public init(_ initialValue: Value? = nil)
    {
        value = initialValue
    }

    public var value: Value?
    {
        didSet
        {
            if oldValue != value
            {
                updateObservers(oldValue: oldValue)
            }
        }
    }

    private func updateObservers(oldValue: Value?)
    {
        removeNilObservers()

        for observerInfo in observerInfos.values
        {
            observerInfo.update?(oldValue, value)
        }
    }

    public func removeNilObservers()
    {
        observerInfos.remove { $0.observer == nil || $0.update == nil}

        if observerInfos.count == 0
        {
            observedVariables[hash(self)] = nil
        }
    }

    private var observerInfos = [HashValue: ObserverInfo]()

    private struct ObserverInfo
    {
        weak var observer: AnyObject?
        var update: Update?
    }

    public typealias Update = (_ old: Value?, _ new: Value?) -> ()
}

// MARK: - Remove an Observer From All Variables

fileprivate func removeObserverFromAllVariables(_ observer: AnyObject)
{
    for weakObservedVariable in observedVariables.values
    {
        weakObservedVariable.observerRemover?.remove(observer)
    }
}

fileprivate var observedVariables = [HashValue: WeakObserverRemover]()

fileprivate struct WeakObserverRemover
{
    weak var observerRemover: ObserverRemover?
}

fileprivate protocol ObserverRemover: AnyObject
{
    func remove(_ observer: AnyObject)
}

// MARK: -

fileprivate class Observation
{
    // MARK: Add Observers

    static func add(_ observer: AnyObject,
                    of observed: AnyObject,
                    with update: @escaping (Any?) -> ())
    {
        removeAbandonedObservings()

        let observerInfo = ObserverInfo(observer: observer, update: update)

        mapping(of: observed).observerInfos[hash(observer)] = observerInfo
    }

    private static func mapping(of observed: AnyObject) -> Mapping
    {
        return mappings[hash(observed)] ?? createAndAddMapping(of: observed)
    }

    private static func createAndAddMapping(of observed: AnyObject) -> Mapping
    {
        let mapping = Mapping()

        mapping.observed = observed

        mappings[hash(observed)] = mapping

        return mapping
    }

    // MARK: Remove Observers

    static func remove(_ observer: AnyObject, of observed: AnyObject)
    {
        removeAbandonedObservings()

        guard let mapping = mappings[hash(observed)] else { return }

        mapping.observerInfos[hash(observer)] = nil

        if mapping.observerInfos.isEmpty
        {
            mappings[hash(observed)] = nil
        }
    }

    static func removeAllObservers(of observed: AnyObject)
    {
        removeAbandonedObservings()

        mappings[hash(observed)] = nil
    }

    static func removeObserverFromAllObservables(_ observer: AnyObject)
    {
        for mapping in mappings.values
        {
            mapping.observerInfos[hash(observer)] = nil
        }

        removeAbandonedObservings()
    }

    // MARK: Send Events to Observers

    static func updateObservers(of observed: AnyObject, with event: Any?)
    {
        removeAbandonedObservings()

        guard let mapping = mappings[hash(observed)] else { return }

        for observer in mapping.observerInfos.values
        {
            observer.update?(event)
        }
    }

    static func removeAbandonedObservings()
    {
        for mapping in mappings.values
        {
            mapping.observerInfos.remove
            {
                $0.observer == nil || $0.update == nil
            }
        }

        mappings.remove { $0.observed == nil || $0.observerInfos.isEmpty }
    }

    // MARK: Private State

    private static var mappings = [HashValue: Mapping]()

    private class Mapping
    {
        weak var observed: AnyObject?

        var observerInfos = [HashValue: ObserverInfo]()
    }

    private class ObserverInfo
    {
        init(observer: AnyObject, update: @escaping (Any?) -> ())
        {
            self.observer = observer
            self.update = update
        }

        weak var observer: AnyObject?
        var update: ((Any?) -> ())?
    }
}

// MARK: - Hashing

fileprivate func hash(_ object: AnyObject) -> HashValue
{
    return ObjectIdentifier(object).hashValue
}

fileprivate typealias HashValue = Int

{% endraw %}
{% endhighlight %}
