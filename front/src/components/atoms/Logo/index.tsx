import React from 'react';
import { Heading } from '@chakra-ui/react';
import Link from 'next/link';

export const Logo = () => {
  return (
    <Link href="/">
      <Heading color="white">イエケイタベタイ</Heading>
    </Link>
  );
};
