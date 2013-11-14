#include<iostream>
#include"QueueA.h"
using namespace std;

int main(){
	Queue aQueue;
	aQueue.enqueue(5);
	aQueue.enqueue(3);
	aQueue.enqueue(7);
	aQueue.enqueue(1);
	aQueue.enqueue(9);
	aQueue.dequeue();
	aQueue.dequeue();
	aQueue.enqueue(13);

	int num;
	
	while (!aQueue.isEmpty()){
	aQueue.getFront(num);
	
	cout<<num<<" ";
	aQueue.dequeue();
	}
	
}