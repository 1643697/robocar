#!/bin/bash

#Data Declaration
gpio -g mode 22 output 

#Kill whatever direction was going on beforehand
gpio -g write 17 0
gpio -g write 27 0
gpio -g write 22 0
gpio -g write 10 0

#take this direction
gpio -g write 22 1

#troubleshooting purposes
echo "Up:" 
gpio -g read 17
echo "  " 

echo " Left:"
gpio -g read 27
echo "  " 

echo " Down:"
gpio -g read 22 
echo "  " 

echo " Right:"
gpio -g read 10 
echo "  " 


