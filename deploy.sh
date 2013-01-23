#!/usr/bin/env bash

rsync -e ssh -a --delete --progress --compress --exclude-from './rsync-exclude.txt' ./ ghdca:/home/ghdca/public_html
rsync -e ssh -a --delete --progress --compress --exclude-from './rsync-exclude.txt' ./ ghdcom:/home/ghdcom/public_html
