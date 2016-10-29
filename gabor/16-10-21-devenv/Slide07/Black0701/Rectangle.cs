using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0701
{
    class Rectangle : Shape
    {
        // Properties
        protected double Width { get; set; }
        protected double Height { get; set; }

        // Constructor
        public Rectangle(int width, int height)
        {
            this.Width = width;
            this.Height = height;
        }

        // Override abstract method
        public override double GetArea()
        {
            return this.Width * this.Height;
        }

        // Override virtual method
        public override void Draw()
        {
            Console.WriteLine($"Drawing a {this.GetType().Name}");
        }
    }
}
