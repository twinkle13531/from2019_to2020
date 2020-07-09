import argparse
 
# パーサーを作る
parser = argparse.ArgumentParser(
            prog='Argparse_3', # プログラム名
            usage='Demonstration of argparser', # プログラムの利用方法
            description='description', # 引数のヘルプの前に表示
            epilog='end', # 引数のヘルプの後で表示
            add_help=True, # -h/–help オプションの追加
            )
 
# 引数の追加
parser.add_argument('-v', '--verbose', help='select mode') #help='select mode'の追加
 
# 引数を解析する
args = parser.parse_args()

'''
$ python Argparse_3.py -h
usage: Demonstration of argparser
 
description
 
optional arguments:
  -h, --help            show this help message and exit
  -v VERBOSE, --verbose VERBOSE
                        select mode
 
end
'''