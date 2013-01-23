#!/usr/bin/env bash

stylus -c -u nib theme/css/theme.styl
md5sum=`md5 -q theme/css/theme.css`

mv theme/css/theme.css theme/css/theme.${md5sum}.css
