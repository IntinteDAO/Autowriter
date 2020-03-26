# -*- coding: utf-8 -*-

from hive import Hive
from hive.transactionbuilder import TransactionBuilder
from hivebase import operations
from datetime import datetime, timedelta

import time, random, os

nodes = ['https://api.steem.house', 'https://api.hive.blog']

posting_key = ''

with open('posting_key.txt', 'r') as f:
    posting_key = f.read().strip()

def submit_post(title, tags, body, author):
    hive = Hive(nodes=nodes, keys=[posting_key])
    permlink_title = ''.join(e for e in title if e.isalnum()).lower()
    json_metadata = { 'community':'busy','app':'busy/2.5.7','format':'markdown', 'tags': tags }

    try:
        hive.post(title=title, body=body, author=author, tags=tags, json_metadata=json_metadata, self_vote=False)
        print ("Submitted post")
    except Exception as error:
        print(repr(error))

def run():
    author = 'nickname'
    title  = 'Text ' + time.strftime("%Y-%m-%d")
    tags = 'tag1 tag2'
    body = open("post.txt").read()
    permlink = submit_post(title, tags, body, author)

if __name__ == '__main__':
    run()
