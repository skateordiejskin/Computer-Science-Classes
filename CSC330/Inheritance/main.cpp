#include "Circle.h"
#include "Point2D.h"
#include "Cylinder.h"

int main(){
	 
	int s,t;
	double j;

	Point2D p2Dfirst, p2Dsecond;
	Point2D p2Dthird(2,3);

	p2Dfirst.print();
	
	cout<<endl<<"Please enter a value for X: ";
	cin>>s;
	p2Dsecond.setX(s);

	cout<<endl<<"Please enter a value for Y: ";
	cin>>t;
	p2Dsecond.setY(t);

	p2Dsecond.print();
	cout<<endl;

	p2Dthird.print();
	p2Dthird.equal(p2Dsecond);
	

	Circle circFirst, circSecond;
	Circle circThird(2,3);
	cout<<endl;

	circFirst.calculate_area();
	circFirst.print();
	cout<<endl;
	
	circSecond.setX(s);
	circSecond.setY(t);
	circSecond.calculate_area();
	circSecond.print();
	cout<<endl;

	circThird.calculate_area();
	circThird.print();
	circThird.equal(circSecond);
	cout<<endl;
	circThird.calculate_distance(circSecond);
	cout<<endl;


	Cylinder cylFirst, cylSecond;
	Cylinder cylThrid (4,5);
	
	cylFirst.calculate_area();
	cylFirst.calculate_volume();
	cylFirst.print();
	cout<<endl;
	
	cylSecond.setX(s);
	cylSecond.setY(t);
	cout<<"Please input a height ";
	cin>>j;
	cylSecond.setHeight(j);
	cylSecond.calculate_area();
	cylSecond.calculate_volume();
	cylSecond.print();
	cout<<endl;
	
	cylThrid.calculate_area();
	cylThrid.calculate_volume();
	cylThrid.print();
	cout<<endl;
	cylThrid.equal(cylSecond);
	cout<<endl;
	

	return 0;
}
