using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0702
{
    class Circle : Shape
    {
        protected double Radius { get; set; }

        public Circle(double radius)
        {
            this.Radius = radius;
        }

        public override double GetArea()
        {
            return this.Radius * this.Radius * Math.PI;
        }
    }
}
