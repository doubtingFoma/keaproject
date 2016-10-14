using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Slide06
{
    abstract class Shape
    {
        protected double Width { get; set; }
        protected double Height { get; set; }
        protected string Type { get; set; }

        // Calculates the area
        public abstract double Area();

        // Sets the dimensions
        public void Dimensions(double width, double height)
        {
            this.Width = width;
            this.Height = height;
        }
    }
}
