#!/bin/sh
BASE_DIR=`cd .. && pwd`
languages=(en es fr ja pl pt ru zh)

for i in en es fr ja pl pt ru zh
do
    cd ${BASE_DIR}/${i} && make clean && cd ..
done
