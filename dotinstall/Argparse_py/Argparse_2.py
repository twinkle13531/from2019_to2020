import argparse
 
# パーサーを作る
parser = argparse.ArgumentParser(
            prog='Argparse_2', # プログラム名
            usage='Demonstration of argparser', # プログラムの利用方法
            description='description', # 引数のヘルプの前に表示
            epilog='end', # 引数のヘルプの後で表示
            add_help=True, # -h/–help オプションの追加
            )
 
# 引数の追加
parser.add_argument('-v', '--verbose')
 
# 引数を解析する
args = parser.parse_args()


'''
$ python Argparse_2.py -h
usage: Demonstration of argparser
 
description
 
optional arguments:
  -h, --help            show this help message and exit
  -v VERBOSE, --verbose VERBOSE
 
end
'''

'''
解説👇
add_argumentメソッドの引数で接頭辞「-」がついたオプション引数を指定しています。
接頭辞「–」で短い略語を指定し、接頭辞「—-」で長い名称を指定しています。
実行結果を確認すると、オプション引数(optional arguments):に「-v」、「–-verbose」と追加されている。
しかし、「-h」、「–-help」の「show this help message and exit」のような記述が
「-v」、「–-verbose」には見当たりません。
'''