using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    class Triangle:Shape
    {
        public Triangle(double width, double height)
        {
            this.Dimensions(width, height);
        }

        public override double Area()
        {
            double area = this.Width * this.Height / 2;
            Console.WriteLine($"Triangle area: { area }");
            return area;
        }
    }
}
