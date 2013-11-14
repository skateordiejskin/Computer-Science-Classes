#ifndef Cylinder_H
#define Cylinder_H
#include "Circle.h"

class Cylinder : public Circle{
	double height, volume;
public:
	Cylinder();
	Cylinder(int,int);
	void setX(int);
	void setY(int);
	int getX();
	int getY();
	void print();
	void equal(Cylinder);
	void calculate_area();
	void calculate_volume();
	double getHeight();
	double getArea();
	double getVolume();
	void setHeight(double);
};

#endif