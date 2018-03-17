<!DOCTYPE HTML>

<html lang="en">

<head>
    <?php
        include($_SERVER['DOCUMENT_ROOT'] . "/site_components/html_head.php");
        echoHTMLHeadContent("task management, task, app, flow, todo, to-do, todo list, list, flowlist, task list, omni focus, omnifocus, wunderlist, things, todoist, focus, reminders, calendar, trello",
                            "Sebastian Fichtner",
                            "Flowlist is an elegant task manager and note taking app",
                            "Flowlist",
                            "flowlist.css");
    ?>
    <meta property="og:image"              content="http://www.flowtoolz.com/flowlist/tasklists.png">
    <meta property="og:url"                content="http://www.flowtoolz.com/flowlist/" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Flowlist App" />
    <meta property="og:description"        content="The most simple and elegant personal idea organizer, task manager and note taking app for Mac" />
</head>

<body>
    <section>
        <div>
            <h1>
                Flowlist
            </h2>
            <h2>
                <nobr>Capture ideas quickly.</nobr> <nobr>Organize your stuff freely.</nobr><br>Focus on what's important.
            </h2>
            <p id="fl-download-paragraph">
                <a href="/flowlist/Flowlist_v0.1.2.zip">
                    <button>
                        <img style="height:25px;width:auto;margin-right:5px;" src="download_icon_small.png"></img>
                        Download the App
                    </button>
                </a>
                <br><br>
                Free prototype version 0.1.2 for macOS 10.10+
            </p>
        </div>
    </section>
    
    <section>
        <div>
            <h1>Innovative</h1>
            <h2>A unified design <nobr>offers flexibility</nobr><br>as well as simplicity.</h2>
            <p class="fl-image-paragraph">
                <img style="max-width:768px;" src="tasklists.png"></img>
            <p>
            <div class="row small-up-1 medium-up-2 large-up-3">
                <div class="column column-block">
                    <h3>The Familiar</h3>
                    Like other task managers, Flowlist shows 3 main views: A task list in the middle, an overview on the left for context, and a detail view on the right showing details like subtasks of the selected task.
                </div>
                <div class="column column-block">
                    <h3>More Flexible</h3>
                    Unlike other task managers, Flowlist does not force your stuff into fixed categories like <i>Project</i> or <i>Subtask</i>. In Flowlist, tasks may contain tasks, and that's it. You can create any hierarchy of tasks.
                </div>
                <div class="column column-block">
                    <h3>Yet More Elegant</h3>
                    In Flowlist, the 3 main views are all task lists. Each shows the details of what is selected in the list to its left. Just hit the left or right Arrow Key to slide the context or the detail view into focus.
                </div>
            </div>
        </div>
    </section>

    <section>
        <div>
            <h1>Quick</h1>
            <h2>Intuitive keyboard commands<br><nobr>enable rapid editing</nobr> <nobr>and a clean interface.</nobr></h2>
            <div class="row small-up-1 medium-up-2 large-up-3">
                <div class="column column-block">
                    <h3>Navigate Tasks</h3>Use the <span class="fl-command-span">Arrow Keys</span> to select a different task. You can go up and down within a list. You can also move the focus left to the overview list or right to the subtasks of the currently selected task.
                </div>
                <div class="column column-block">
                    <h3>Add New Tasks</h3>Hit <span class="fl-command-span">Space</span> to add a task to the top of the list. Hit <span class="fl-command-span">Return</span> to add one below the currently selected task. By using <span class="fl-command-span">Return</span> repeatedly, you can write tasks like lines in a text from anywhere in the list downwards.
                </div>
                <div class="column column-block">
                    <h3>Prioritize Tasks</h3>Hit <span class="fl-command-span">Cmd + Up/Down Arrow</span>, to move a single selected task up or down in the list. Thereby you can visually prioritize tasks. You can also move completed tasks that were put to the end of the list.
                </div>
                <div class="column column-block">
                    <h3>Do Batch Processing</h3>Some actions can be applied to multiple tasks at once. To select multiple tasks, hold <span class="fl-command-span">Shift</span> while using the <span class="fl-command-span">Arrow Keys</span>. Or hold <span class="fl-command-span">Cmd</span> while clicking a task to add or remove it from the selection.
                </div>
                <div class="column column-block">
                    <h3>Delete Tasks</h3>Hit <span class="fl-command-span">Backshift</span> to delete all selected tasks. The task above the first deleted task then gets selected. By hitting <span class="fl-command-span">Backshift</span> repeatedly, you can delete multiple tasks from anywhere in the list like characters from a text.
                </div>
                <div class="column column-block">
                    <h3>Check Tasks Off</h3>Click its check box to complete a task. Or hit <span class="fl-command-span">Cmd + Backshift</span> to complete the first active selected task. When completing tasks they move below the last active task, so you'll see them sorted by order of completion.
                </div>
                <div class="column column-block">
                    <h3>Rename Tasks</h3>Hit <span class="fl-command-span">Cmd + Return</span> to rename the first selected task. If multiple tasks are selected, entering the name for one task immediately unselects that task and begins editing the name of the next selected task.
                </div>
                <div class="column column-block">
                    <h3>Group Tasks Together</h3>Select multiple tasks and hit <span class="fl-command-span">Return</span> to group the selection and name the group. Tasks that contain others as subtasks have an arrow indicator. If you select such a task, the detail list on the right shows the subtasks.
                </div>
                <div class="column column-block">
                    <h3>Add Subtasks</h3>If a task has no subtasks, you can still focus its subtask list and start adding tasks there. The group indicator in the overview list on the left appears/disappears when the focused list becomes non-empty/empty.
                </div>
            </div>
        </div>
    </section>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/site_components/load_scripts.php"); ?>

</body>

</html>