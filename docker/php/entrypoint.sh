#!/bin/sh

chmod o+w ./storage/ -R

exec "$@"