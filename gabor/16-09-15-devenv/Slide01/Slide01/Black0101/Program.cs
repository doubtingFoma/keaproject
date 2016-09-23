using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0101
{
    class Program
    {
        static void Main(string[] args)
        {
            string name = "Gabor";
            int age = 24;
            float rate = 25.5F;
            //double rate = 15.5D;

            Console.WriteLine("Name: {0}, age: {1}, rate: {2}", name, age, rate);
            Console.WriteLine($"Name: {name}, age: {age}, rate: {rate}");
        }
    }
}
