using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_07_02
{
    class Program
    {
        static void Main(string[] args)
        {
            Triangle myTriangle = new Triangle(10, 20);
            Rectangle myRectangle = new Rectangle(20, 20);
            Circle myCircle = new Circle(10);

            List<Shapes> myShapes = new List<Shapes>();

            myShapes.Add(myTriangle);
            myShapes.Add(myRectangle);
            myShapes.Add(myCircle);

            DrawShapes(myShapes);

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

            public virtual void Draw()
            {
                if (this is Circle)
                {
                    Console.WriteLine("Drawing a Circle");
                }
                else
                {
                    Console.WriteLine("Drawing a Shape");
                }
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

            public override void Draw()
            {
                Console.WriteLine("Drawing a Triangle");
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
            public bool IsSquare()
            {
                if (this.Height == this.Width)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }

            public override void Draw()
            {
                Console.WriteLine("Drawing a Rectangle");
            }

        }

        class Circle : Shapes
        {
            public Circle(double radius)
            {
                
            }
        }



        //we shouldn't give a public or private property for this function
        static double GetArea(Triangle tri, Rectangle rect)
        {
            return tri.Area() + rect.Area();
        }

        static void DrawShapes(List<Shapes> listOfSpapes)
        {
            for (int i = 0; i < listOfSpapes.Count(); i++)
            {
                listOfSpapes[i].Draw();
            }
        }


    }
}
