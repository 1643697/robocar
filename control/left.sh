#!/bin/bash

#Data Declaration
gpio -g mode 27 output

#Kill whatever direction was going on beforehand
gpio -g write 17 0
gpio -g write 27 0
gpio -g write 22 0
gpio -g write 10 0

#take this direction
gpio -g write 27 1

#troubleshooting purposes
echo "gpio -g read 27" 
