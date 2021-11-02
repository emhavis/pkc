#! /bin/bash
docker save emhavis/pkc_semanticwiki:v0.1 | gzip > xlp_mediawiki.tar.gz
docker save emhavis/pkc_matomo:v0.1 | gzip > xlp_matomo.tar.gz
docker save emhavis/pkc_phpmyadmin:v0.1 | gzip > xlp_phpmyadmin.tar.gz
docker save emhavis/pkc_mariadb:v0.1 | gzip > xlp_mariadb.tar.gz
docker save emhavis/pkc_codeserver:v0.1 | gzip > xlp_codeserver.tar.gz
docker save emhavis/pkc_gitea:v0.1 | gzip > xlp_gitea.tar.gz