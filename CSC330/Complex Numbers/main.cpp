#include "complexNum.h"

int main(){

	Complex a(10.0f, -2.f); //calls constructor
	cout<<a<<endl;

	Complex b(2.0f);
	Complex c=b;
	c=a;

	b.getRealPart();
	b.getImagPart();
	c.getRealPart();
	b.getImagPart();

	Complex d(0.1f,0.f);
	
	d=a+b; //calls overloaded +
	
	d=a-b; //calls overloaded -
	d=a*b; //calls overloaded *
	cout<<d<<endl;

	return 0;
}


//Output
/*
Real Part = 10
Imaginary Part = -2
z = 10-2i

Enter Real: 25

Enter Imaginary: 65
Enter Real: 39

Enter Imaginary: 84
Real Part = 418
Imaginary Part = 790
z = 418+790i

Press any key to continue . . .
*/