## Build Website Locally

`bundle exec jekyll build`

## Install (a.k.a. The Dependency Mess)

install homebrew:

`/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"`

then fix homebrew:

```
rm -rf "/opt/homebrew/Library/Taps/homebrew/homebrew-core"
brew tap homebrew/core
git -C $(brew --repo homebrew/core) checkout master
```

install ruby version manager and ruby installer:

`brew install chruby ruby-install`

fix the ruby installer:

`brew install xz`

install ruby:

`ruby-install ruby`

configure shell to use `chruby`:

```
echo "source $(brew --prefix)/opt/chruby/share/chruby/chruby.sh" >> ~/.zshrc
echo "source $(brew --prefix)/opt/chruby/share/chruby/auto.sh" >> ~/.zshrc
echo "chruby ruby-3.1.2" >> ~/.zshrc # run 'chruby' to see actual version
```

relaunch terminal and validate ruby version:

`ruby -v`

install jekyll:

`gem install jekyll`

fix jekyll:

`bundle install`