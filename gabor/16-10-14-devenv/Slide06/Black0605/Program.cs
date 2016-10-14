using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class Program
    {
        static void Main(string[] args)
        {
            Triangle myTriangle = new Triangle(50, 40);
            Rectangle myRectangle = new Rectangle(50, 40);
            Rectangle mySecondRectangle = new Rectangle(60, 60);

            myTriangle.Area();
            myRectangle.Area();
            myRectangle.IsSquare();
            mySecondRectangle.Area();
            mySecondRectangle.IsSquare();

            double combinedArea = GetArea(myTriangle, myRectangle);
            Console.WriteLine($"Combined area: {combinedArea}");
        }

        public static double GetArea(Triangle triangle, Rectangle rectangle)
        {
            return triangle.Area() + rectangle.Area();
        }
    }
}
