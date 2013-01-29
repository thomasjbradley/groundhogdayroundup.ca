#!/usr/bin/env bash

stylus -c -u nib css/groundhog-day-roundup.styl
md5sum=`md5 -q css/groundhog-day-roundup.css`

mv css/groundhog-day-roundup.css css/groundhog-day-roundup.${md5sum}.css
