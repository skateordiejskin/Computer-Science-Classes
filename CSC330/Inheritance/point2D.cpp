#include "Point2D.h";

//Default Constructor
Point2D::Point2D(){
	x=0;
	y=0;
}

//Constructor Initializer
Point2D::Point2D(int a=0, int b=0){
	x=a;
	y=b;
}

//Sets private x=a
void Point2D::setX(int a){
	x=a;
}

//Sets private y=b
void Point2D::setY(int b){
	y=b;
}

//checks if user defined x and y
//are equal to x and y set in main
void Point2D::equal(Point2D a1){
	if((a1.y - a1.x) == (y-x))
		cout<<"X and Y are equal"<<endl;
	else
		cout<<"X and Y are not equal"<<endl;
}

//prints out values of X and Y
void Point2D::print(){
	cout<<"The value of X is "<<x<<endl;
	cout<<"The value of Y is "<<y<<endl;
}

//returns X
int Point2D::getX(){
	return x;
}

//returns Y
int Point2D::getY(){
	return y;
}