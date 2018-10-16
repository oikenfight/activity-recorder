## README.md
```
$ git clone git@github.com:oikenfight/activity-recorder.git
$ cd activity-recorder
$ docker-compose build
$ docker-compose up -d
$ cp .env.example .env
$ docker-compose run --rm composer install
$ docker-compose run --rm npm install
$ docker-compose run --rm npm run dev
$ docker-compose run --rm artisan key:generate
$ docker-compose run --rm artisan migrate
$ chmod -R 777 storage/
```

## Memo
- 撮影した動画はこのアプリの `storage/app/public/actions/` 以下に保存される
- Python コンテナで使う場合、そのコンテナから見える場所に、上記のディレクトリを同期すればいい
```
$ rsync -r /path/to/storage/app/public/actions /path/to/mount/dir/some_dir/
```
