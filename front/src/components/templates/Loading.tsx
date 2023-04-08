import { MainSpinner } from '../atoms/Sppner';
import { Flex } from '@chakra-ui/react';
import { MainText } from '../atoms/Text/MainText';

export const Loading = () => {
  return (
    <>
      <Flex h="100vh" justify="center" align="center" bg="gray.100">
        <MainSpinner size="xl" />
        <MainText>Loading...</MainText>
      </Flex>
    </>
  );
};
