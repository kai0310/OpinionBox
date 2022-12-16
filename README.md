# OpinionBox

- [Official Manual](https://opinionbox.netlify.app)

<p>
    <a href="">
        <img src="https://img.shields.io/github/languages/top/kai0310/OpinionBox" />
    </a>
    <a href="https://opensource.org/licenses/Apache-2.0">
        <img src="https://img.shields.io/github/license/kai0310/OpinionBox" />
    </a>
</p>

## Screenshot

<img src="./public/ogp.png" />

<img src="https://user-images.githubusercontent.com/52205108/103396209-38bb7c00-4b75-11eb-9e50-9c3c2e025f14.png" width="800px" alt="screenshot1" />


## Overview
It is a web application that aims to gather students' opinions and consultations on the web.

## Author
- [kai0310](https://github.com/kai0310)

## Requirement
- Git
- PHP(7.3<=)
- Composer
- Node.js

## Install

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```



```bash
$ git clone https://github.com/kai0310/OpinionBox.git
$ cd OpinionBox
$ composer install
$ composer sail:up
$ ./vendor/bin/sail artisan key:generate
$ ./vendor/bin/sail artisan migrate

$ ./vendor/bin/sail up -d
```

Let's get access [http://localhost](http://localhost)

## Note
Please note that I do not take any responsibility or liability for any damage or loss caused through this service.

## LICENSE
Licensed under the [Apache License, Version 2.0](./LICENSE)

All photos, materials and logos will be kept under license. Please make sure to include the copyright when using them.
