//Joe Skinner
//Lab 1
#include <iostream>
#include <cmath>
#include <iomanip>

using namespace std;


class Complex{
	double real;
	double imag;
public:
	Complex(Complex&);
	Complex(double, double);
	double getRealPart();
	double getImagPart();
	void setReal(double);
	void setImag(double);
	
	Complex operator+(Complex);
	Complex operator-(Complex);
	Complex operator*(Complex);
	friend ostream& operator <<(ostream &s,Complex &c);
	//void print(Complex&);
};

//Constructor
Complex::Complex(double r=0.0f, double i=0.0f){
	real=r;
	imag=i;
}

//Copy constructor
Complex::Complex(Complex &c){
	this->real=c.real;
	this->imag=c.imag;
}

Complex Complex::operator+(Complex c){
	Complex tmp;
	tmp.real=this->real+c.real;
	tmp.imag=this->imag+c.imag;
	return tmp;
}

Complex Complex::operator-(Complex c){
	Complex tmp;
	tmp.real=this->real-c.real;
	tmp.imag=this->imag-c.imag;
	return tmp;
}

Complex Complex::operator*(Complex c){
	Complex tmp;
	tmp.real=(real*c.real)-(imag*c.imag);
    tmp.imag=(real*c.imag)+(imag*c.real);
    return tmp;
}

 double Complex::getRealPart(){
	cout<<"Enter Real: ";
	cin>>this->real;
	return real;
 }

 double Complex::getImagPart(){
	cout<<endl<<"Enter Imaginary: ";
	cin>>this->imag;
	return imag;
 }

 void Complex::setReal(double r){
	 real=r;
 }

 void Complex::setImag(double i){
	 imag=i;
 }
 ostream& operator <<(ostream &s,Complex &c){
	 s<<"Real Part = "<<c.real<<endl
     <<"Imaginary Part = "<<c.imag<<endl;
     s<<"z = "<<c.real<<setiosflags(ios::showpos)
     <<c.imag<<"i"<<endl<<resetiosflags(ios::showpos);
     return s;
 }
