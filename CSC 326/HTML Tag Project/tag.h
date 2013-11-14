#include <iostream>
#include <string>
using namespace std;

class Tag
{
public:
	void get();
	int getlength();
	int movingthrough(int i);
	void display();
private:
	string name;
	bool open;
	int count;
};