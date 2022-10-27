#!/bin/bash  
git add *
now=$(date)
git commit -m 'Script $now'
git push