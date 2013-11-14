#include "Circle.h"

Circle::Circle():Point2D(){
	distance=0;
	area=0;
}

Circle::Circle(int a, int b):Point2D(a, b){
	distance=0;
	area=0;
	radius=0;
}

int Circle::getX(){
	return Point2D::getX();
}

int Circle::getY(){
	return Point2D::getY();
}

double Circle::getArea(){
	return area;
}

double Circle::getDistance(){
	return distance;
}

void Circle::setY(int a){
	Point2D::setY(a);
}

void Circle::setX(int b){
	Point2D::setX(b);
}

void Circle::calculate_area(){
	int a,b;
	a=Point2D::getX();
	b=Point2D::getY();
	radius=sqrt( pow((static_cast<double>(a-0)),2) + pow((static_cast<double>(b-0)),2));
	area= pow(radius,2)*3.14;
}

void Circle::calculate_distance(Circle r1){
	int x, y, a, b;
	double x1,y1, distance;
	x=r1.getX();
	y=r1.getY();
	a=getX();
	b=getY();
	x1=static_cast<double>(x-a);
	y1=static_cast<double>(y-b);
	x1=pow(x1,2);
	y1=pow(y1,2);
	distance=sqrt((x1+y1));
	cout<<"the distance between the two Circles is " <<distance;
}

void Circle::print(){
	Point2D::print();
	cout<<"The area of the Circle is " <<area <<endl;
	cout<<"The radius is "<<radius <<endl;
}


void Circle::equal(Circle r1){
	if ((r1.area) == (area))
		cout<<"The two Circles are equal";
	else
		cout<<"The two Circles are not equal";
}

