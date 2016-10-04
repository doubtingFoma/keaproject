using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black_Exercise_05_05
{
    class Program
    {
        static void Main(string[] args)
        {
            Box MyLittleBox = new Box();

            //we use the properties the same as functions at fields
            //see: set accessor
            MyLittleBox.Height = 30f;
            MyLittleBox.Width = 20f;
            MyLittleBox.Length= 10f;

            //if we don't assign a value to them they return a value (see: get accessor)
            Console.WriteLine($"Height: {MyLittleBox.Height}");
            Console.WriteLine($"Width: {MyLittleBox.Width}");
            Console.WriteLine($"Length: {MyLittleBox.Length}");


            //simply calling a read-only function. We cannot pass a value to it, but we can read its return value
            Console.WriteLine($"The volume of the box is {MyLittleBox.CalcVolume}.");
            Console.WriteLine($"The surface area of the box is {MyLittleBox.CalcSurface}.");

            Console.ReadKey();
        }
    }
}
