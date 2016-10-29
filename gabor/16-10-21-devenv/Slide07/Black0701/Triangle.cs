using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0701
{
    class Triangle : Shape
    {
        // Properties
        protected double Width { get; set; }
        protected double Height { get; set; }

        // Constructor
        public Triangle(int width, int height)
        {
            this.Width = width;
            this.Height = height;
        }

        // Override abstract method
        public override double GetArea()
        {
            return this.Width * this.Height / 2;
        }

        // Override virtual method
        public override void Draw()
        {
            Console.WriteLine($"Drawing a {this.GetType().Name}");
        }
    }
}
