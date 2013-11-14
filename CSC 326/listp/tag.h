#include <iostream>
#include <string>
#include <fstream>
using namespace std;

class Tag{
public:
	Tag();
	Tag(string);
	int doingIt(int);
	void display();
	int get(int);
private:
	string htmlTag;
	bool open;
};
