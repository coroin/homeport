# Homeport

Homeport is a script (`homeport`) installed your project-root with shortcuts to streamline your workflow while interacting with [laradock](http://laradock.io) in a multi-project environment.

## Installation

0. Homeport requires [Laradock](http://laradock.io). It is suggested to install it in the root of your `~/projects` folder:

```bash
mkdir -p ~/projects && cd ~/projects
git clone https://github.com/Laradock/laradock.git
```

1. Install Homeport in your project(s):

```bash
composer require coroin/homeport
php artisan vendor:publish --provider="Homeport\HomeportServiceProvider"
chmod +x homeport
```

2. Review the `homeport` script and customize for your project, if needed.

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

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## Learning Docker

If you're unfamiliar with Docker, check out Chris Fidao's awesome [Docker in Development](https://serversforhackers.com/s/docker-in-development) and [Shipping Docker](https://serversforhackers.com/shipping-docker) courses at [serversforhackers.com](https://serversforhackers.com).

## Supported Systems

Homeport requires Docker and currently works on Windows, Mac and Linux.

> Windows requires running Hyper-V.  Using Git Bash (MINGW64) and WSL are supported.

| Mac           | Linux         | Windows |
| ------------- |:-------------:|:-------:|
| Install Docker on [Mac](https://docs.docker.com/docker-for-mac/install/) | Install Docker on [Debian](https://docs.docker.com/engine/installation/linux/docker-ce/debian/) | Install Docker on [Windows](https://docs.docker.com/docker-for-windows/install/) |
|       | Install Docker on [Ubuntu](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/) | |
|       | Install Docker on [CentOS](https://docs.docker.com/engine/installation/linux/docker-ce/centos/) | |
