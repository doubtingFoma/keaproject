using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class Rectangle : Shape
    {
        // Constructor
        public Rectangle(double width, double height)
        {
            this.Dimensions(width, height);
        }

        public override double Area()
        {
            double area = this.Width * this.Height;
            Console.WriteLine($"Rectangle area: {area}");
            return area;
        }

        public bool IsSquare()
        {
            bool isSquare = this.Width == this.Height;
            Console.WriteLine($"Is rectangle square?  {isSquare}");
            return isSquare;
        }
    }
}
