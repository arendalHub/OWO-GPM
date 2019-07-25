#!/bin/bash

docker run \
    --name owogpm-postgres \
    -p 5436:5432 \
    -e POSTGRES_USER=owogpm \
    -e POSTGRES_PASSWORD=owogpm \
    -e POSTGRES_DB=owogpm \
    -e PGDATA=/var/lib/postgresql/data \
    --restart=always \
    postgres:9.6.12