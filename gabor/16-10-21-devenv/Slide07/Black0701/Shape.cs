using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0701
{
    abstract class Shape
    {
        // Virtual method - can be overwritten by 'override' in derived classes
        public virtual void Draw()
        {
            Console.WriteLine("Drawing a shape");
        }

        // Abstract method - has to be implemented in derived classes
        public abstract double GetArea();
    }
}
