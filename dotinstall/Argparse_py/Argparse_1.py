# coding: utf-8

import argparse
 
# パーサーを作る
parser = argparse.ArgumentParser(
            prog='Argparse_1.py', # プログラム名
            usage='Demonstration of argparser', # プログラムの利用方法
            description='description', # 引数のヘルプの前に表示
            epilog='end', # 引数のヘルプの後で表示
            add_help=True, # -h/–help オプションの追加
            )
 
# 引数を解析する
args = parser.parse_args()


'''
ターミナル👇
$ python Argparse_1.py -h
usage: Demonstration of argparser
 
description
 
optional arguments:
  -h, --help            show this help message and exit
 
end
'''


'''
発生したエラーに対する解決策
* encoding:utf-8
* source ~/.bash_profile
* argparse.pyという別のファイルの名前を変更した
'''


