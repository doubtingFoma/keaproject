using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_06
{
    class Program
    {
        static void Main(string[] args)
        {
            //creating a new box, and setting its new dimensions at once
            Box MyLittleBox = new Box(30f, 20f, 10f);

            //simply calling a read-only function. We cannot pass a value to it, but we can read its return value
            Console.WriteLine($"The volume of the box is {MyLittleBox.CalcVolume}.");
            Console.WriteLine($"The surface area of the box is {MyLittleBox.CalcSurface}.");            

            Console.ReadKey();
        }
    }
}
