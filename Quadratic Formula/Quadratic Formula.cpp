#include <iostream>
#include <cmath>
#include <iomanip>
#include <conio.h>
using namespace std;

void title()
{
 cout<<setw(50)<<"The Quadratic Formula"<<endl;
 cout<<setw(50)<<"---------------------"<<endl;    
 cout<<endl;
 cout<<endl;     
}

void processInput(float a[3])
{
 cout<<setw(50)<<"Please input the coefficients of the Quadratic Formula: \n";
 cout<<setw(50)<<"(-b+-sqrt(b^2-4ac)/2a)\n";
 cout<<"A: ";
 cin>>a[0];
 cout<<"B: ";
 cin>>a[1];
 cout<<"C: ";
 cin>>a[2];
}

int main()
{
float a[3],root1(0), root2(0),aSymmetry(0),y(0),yComponent(0),squareRt(0);
float imag(0), real =0, imag1=0;
title();
processInput(a);

 
 cout<<"Your equation is "<<a[0]<<"x^2 + "<<a[1]<<"x + "<<a[2]<<"\n\n" ; 

 aSymmetry = -a[1]/(2*a[0]);
 cout<<"The Axis of Symmetry is "<<aSymmetry<<endl<<endl; 
 yComponent = a[0]*pow(aSymmetry,2)+a[1]*aSymmetry+a[2];
 cout<<"The Vertex of this Quadratic Equation is: ("<<aSymmetry<<" , "<<yComponent<<")\n\n"; 
 squareRt = pow(a[1],2)-4*a[0]*a[2];
 if (squareRt < 0){
    imag1 = -1* squareRt;
	real = (-a[1])/((2*a[0]));
	imag1 = sqrt(imag1)/(2*a[0]);
	cout<< real << " + " << imag1<<"i"<<endl;
	cout<< real << " - " << imag1<<"i"<<endl;
    cout<<"These are not real solutions.\n\n";
}
 else
 {root1 = (-a[1] + sqrt(pow(a[1],2) - 4*(a[0])*(a[2])))/(2*(a[0]));
 root2 = (-a[1] - sqrt(a[1]*(a[1]) - 4*(a[0])*(a[2])))/(2*(a[0])); 
 cout<<"Your first root is "<<root1<<"."<<endl<<endl;
 cout<<"Your second root is "<<root2<<"."<<endl<<endl;} 
 if (a[0] > 0)
    cout<<"Your quadratic will open upward.\n\n"<<endl;
 else cout<<"Your quadratic will open downward.\n\n"<<endl;
 getch();
 return 0;
}
