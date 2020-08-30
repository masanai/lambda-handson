#!/bin/bash
aws --region ap-southeast-1 lambda invoke \
  --function-name Convert-Masanai \
  --invocation-type RequestResponse \
  --log-type Tail \
  --payload file://invoke-payload.json \
output.txt
