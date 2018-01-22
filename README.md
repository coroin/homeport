# Homeport

Homeport is a script (`homeport`) installed your project-root with shortcuts to streamline your workflow while interacting with [laradock](http://laradock.io) in a multi-project environment.

## Prerequesites

Homeport requires [Docker](https://www.docker.com/community-edition#/download) and [Laradock](http://laradock.io).

Install laradock in the same root folder as your other projects.

> It is recommended to use the `~/projects` folder

```
/home/USER/projects/        /home/USER/projects/
├── a-project               ├── a-project
├── b-project               ├── b-project
├──                         ├── laradock
├── z-project               ├── z-project
```

Run this to create the `~/projects` folder (if it doesn't already exist) and install laradock:

```bash
mkdir -p ~/projects && cd ~/projects
git clone https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
```

## Installation

Install Homeport in your project:

```bash
composer require coroin/homeport
php artisan vendor:publish --provider="Homeport\HomeportServiceProvider"
chmod +x homeport
```

Review the `homeport` script and customize for your project, if needed:

```bash
## Homeport Configuration

# 1. set path to laradock files
LARADOCK="${HOME}/projects/laradock"    # note: must use ${HOME} instead of ~

# 2. set project name
PROJECT="${PWD##*/}"                    # defaults to current folder

# 3. specify database config
DATABASE_NAME="${PROJECT}"              # defaults to project-name
DATABASE_PASS=root                      # DO NOT CHANGE (laradock default)
DATABASE_TYPE=mariadb                   # [mysql, mariadb]

# 4. select containers to run
CONTAINERS="nginx mariadb redis"        # default uses mariadb
# CONTAINERS="nginx mysql redis"        # uncomment to use mysql
```

Create the nginx config file:

```bash
./homeport setup
```

Add entry to your hosts file:

> It is recommended to use the `.test` top-level-domain for your localdev

```bash
127.0.0.1   yourproject.test
```

> On Mac/\*NIX this file is located at `/etc/hosts`.
> On Windows, it is `C:\Windows\system32\drivers\etc\hosts`

Start laradock:

```bash
./homeport up
```
> The first time you run this command may take some time as docker downloads images.

## Usage

Any command not defined in the `homeport` script will default to being passed to the `docker-compose` command.

If no command is used, it will run `docker-compose ps` to list the running containers used by laradock.

### Starting and Stopping Laradock

```bash
# start laradock
./homeport start

# stop laradock
./homeport stop
```

### Artisan and Composer

```bash
# run artisan commands
./homeport artisan <command>
./homeport art <command> # "art" is a shortcut to "artisan"

# run composer commands
./homeport composer <command>
./homeport comp <command> # "comp" is a shortcut to "composer"
```

### MySql and Redis

```bash
# access the database
./homeport sql

# access the redis cli
./homeport redis
```

### PHPUnit and Debugging

```bash
# run phpunit tests
./homeport test <arguments>
./homeport t <arguments> # "t" is a shortcut to "test"

# tail the laravel log
./homeport log
./homeport log -f # follow
./homeport log -n 10 # show 10 lines of the log
```

## Learning Docker

If you're unfamiliar with Docker, check out Chris Fidao's awesome [Docker in Development](https://serversforhackers.com/s/docker-in-development) and [Shipping Docker](https://serversforhackers.com/shipping-docker) courses at [serversforhackers.com](https://serversforhackers.com).

## Contributing

1. Fork this repo
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request
