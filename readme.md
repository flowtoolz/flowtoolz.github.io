# Jekyll

### Usage

  `jekyll <subcommand> [options]`

### Options

~~~
-s, --source [DIR]  		Source directory (defaults to ./)
-d, --destination [DIR] 	Destination directory (defaults to ./_site)
    --safe         			Safe mode (defaults to false)
-p, --plugins PLUGINS_DIR1[,PLUGINS_DIR2[,...]]
							Plugins directory (defaults to ./_plugins)
    --layouts DIR  			Layouts directory (defaults to ./_layouts)
    --profile      			Generate a Liquid rendering profile
-h, --help         			Show this message
-v, --version      			Print the name and version
-t, --trace        			Show the full backtrace when an error occurs
~~~

### Subcommands

~~~
  docs                  
  import                
  build, b              Build your site
  clean                 Clean the site (removes site output and metadata file) without building.
  doctor, hyde          Search site and print specific deprecation warnings
  help                  Show the help message, optionally for a given subcommand.
  new                   Creates a new Jekyll site scaffold in PATH
  new-theme             Creates a new Jekyll theme scaffold
  serve, server, s      Serve your site locally 
~~~

# Adding Bash Script Files

### Example:
* create plain text file named "build" which contains the command `bundle exec jekyll build`
* type `chmod 700 build` to set permissions
* execute it with `./build` or `sh build`