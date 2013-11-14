#include <iostream>
#include <string>
#include <fstream>
using namespace std;

class Tag{
public:
	Tag();
	void runningThrough();
	void display();
private:
	string htmlTag;
	bool open;
	int htmlLength;
};
