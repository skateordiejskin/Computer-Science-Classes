#include "Cylinder.h"

//Default Constructor
//inherits from class Circle
Cylinder::Cylinder():Circle(){
	volume=0;
	height=0;
}

//Constructor Initializer
//inherits from class Circle
Cylinder::Cylinder(int a, int b):Circle (a,b){
	volume=0;
	height=0;
}

//gets Y from Point2D
int Cylinder::getY(){
	return Point2D::getY();
}

//gets X from Point2D
double Cylinder::getHeight(){
	return height;
}

//returns area
//inherits from Circle
double Cylinder::getArea(){
	return Circle::getArea();
}

//returns volume
//inherits from Circle
double Cylinder::getVolume(){
	return volume;
}

//sets X
//inherits from Point2D
void Cylinder::setX(int a){
	Point2D::setX(a);
}

//sets Y
//inherits from Point2D
void Cylinder::setY(int b){
	Point2D::setY(b);
}

//sets height
void Cylinder::setHeight(double h){
	height=h;
}

//calculates area
//inherits form Circle
void Cylinder::calculate_area(){
	Circle::calculate_area();
}

//Calculates volume
//inherits area value from Circle
void Cylinder::calculate_volume(){
	double x;
	x = Circle::getArea();
	volume = x * height;
}


void Cylinder::equal(Cylinder r1){

	if ((r1.height == height) & (r1.volume == volume))
		cout<<"The two Cylinders are equal";
	else
		cout<<"The two Cylinders are not equal";

}

//inherits Circle's print function
//prints out the volume and height
void Cylinder::print(){
	Circle::print();
	cout<<"The volume is " <<volume <<endl;
	cout<<"The height is " <<height <<endl;
}
