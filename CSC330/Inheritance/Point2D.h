//Joe Skinner
//HW1 CSC330

#ifndef Point2D_H
#define Point2D_H

#include <iostream>
#include <cmath>
using namespace std;

class Point2D{
	
public:
	Point2D();
	Point2D(int, int);
	void setX(int);
	void setY(int);
	int getX();
	int getY();
	void print();
	void equal(Point2D);
private:
	int x,y;
};

#endif