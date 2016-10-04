using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_06
{
    class Box
    {
        //these are the parameters of the box (cannot be seen by anyone)
        private float height, width, length;

        //this is a constructor. It requires 3 arguments (in this case) in order to create a box.
        //it takes all arguments and puts their value into the Box's own private parameters.
        public Box(float Height, float Width, float Length)
        {
            height = Height;
            width = Width;
            length = Length;
        }

        //public function that calculates the volume and returns the value to whoever called it.
        //this is a read only property, because no set accessor is assigned to it.
        public float CalcVolume
        {
            get {
                return height * width * length;
            }

        }

        //this is also a read only property
        public float CalcSurface
        {
            get
            {
                return (2 * height * width) + (2 * length * width) + (2 * height * length);
            }

        }


    }
}
