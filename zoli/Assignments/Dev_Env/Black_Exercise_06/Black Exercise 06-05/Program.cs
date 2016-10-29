using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_06_05
{
    class Program
    {
        static void Main(string[] args)
        {
            Triangle myTriangle = new Triangle(10, 20);
            Rectangle myRectangle = new Rectangle(20, 20);

            
            Console.WriteLine(GetArea(myTriangle, myRectangle));
            
            Console.ReadKey();
        }

        abstract class Shapes
        {
            protected double Width;
            protected double Height;
            protected string Type;

            public virtual double Area()
            {
                return Width * Height;
            }
            public void Dimensions()
            {
                //I have no idea what this should be so...
                Console.WriteLine($"Width: {Width}");
                Console.WriteLine($"Height: {Height}");
            }

        }
        class Triangle : Shapes
        {
            public Triangle(double width, double height)
            {
                this.Width = width;
                this.Height = height;
            }

            public override double Area()
            {
                return base.Area() / 2;
            }

        }
        
        class Rectangle : Shapes
        {
            public Rectangle(double width, double height)
            {
                this.Width = width;
                this.Height = height;
            }

            public override double Area()
            {
                return base.Area();                
            }
            public bool IsSquare(){
                if (this.Height == this.Width)
                {
                    return true;
                } else {
                    return false;  
                }
            }
            
        }
        //we shouldn't give a public or private property for this function
        static double GetArea(Triangle tri, Rectangle rect){
            return  tri.Area() + rect.Area();
        }        

    }
}
