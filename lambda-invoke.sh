#!/bin/bash
aws lambda invoke \ 
  --function-name Convert-Masanai \
  --invocation-type RequestResponse \
  --log-type Tail \
  --payload file://invoke-payload.json |
output.txt
