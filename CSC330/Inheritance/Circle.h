#ifndef Circle_H
#define Circle_H
#include "Point2D.h"

class Circle : public Point2D{
	double area, radius, distance;
public:
	Circle();
	Circle(int, int);
	void setX(int);
	void setY(int);
	int getX();
	int getY();
	void print();
	void equal(Circle);
	void calculate_area();
	void calculate_distance(Circle);
	double getArea();
	double getDistance();
};

#endif