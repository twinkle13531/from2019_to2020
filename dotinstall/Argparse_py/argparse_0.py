# CLI...Command Line Interface
# https://www.sejuku.net/blog/23647
# actionの項目を指定して、引数の指定によって実行結果が変わることを確認していきます。

# 引数の追加
parser.add_argument('-e', '--encode', help='select mode',
                    action='store_true')
parser.add_argument('-d', '--decode', help='select mode',
                    action='store_true')
parser.add_argument('-a', '--align', help='select mode',
                    action='store_true')
 
# 引数を解析する
args = parser.parse_args()
 
if args.verbose:
    print('Hello')
else:
    print('こんにちは')

# 引数の追加
parser.add_argument('-v', '--', help='select mode',
                    action='store_true')
 
# 引数を解析する
args = parser.parse_args()
 
if args.verbose:
    print('Hello')
else:
    print('こんにちは')



############################################################
import sys

def main(argv):
    # このコードは引数と標準出力を用いたサンプルコードです。
    # このコードは好きなように編集・削除してもらって構いません。
    # ---
    # This is a sample code to use arguments and outputs.
    # Edit and remove this code as you like.
    #encode, decode, align


if __name__ == '__main__':
    main(sys.argv[1:])
